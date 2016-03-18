<?php
namespace backend\models;

use common\models\User;
use yii\base\Exception;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;
    public $gender;
    public $date_of_birth;
    public $phone;
    public $cell_phone;
    public $cep;
    public $uf;
    public $city;
    public $neighborhood;
    public $address;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::className(), 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id' => $this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],
            [['date_of_birth'], 'safe'],
            [['phone', 'cell_phone'], 'string', 'max' => 15],
            [['cep'], 'string', 'max' => 20],
            [['uf'], 'string', 'max' => 2],
            [['city'], 'string', 'max' => 100],
            [['neighborhood'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'Email'),
            'status' => Yii::t('common', 'Status'),
            'password' => Yii::t('common', 'Password'),
            'roles' => Yii::t('common', 'Roles'),
            'gender' => Yii::t('common', 'Gender'),
            'date_of_birth' => Yii::t('common', 'Date Of Birth'),
            'phone' => Yii::t('common', 'Phone'),
            'cell_phone' => Yii::t('common', 'Cell Phone'),
            'cep' => Yii::t('common', 'CEP'),
            'uf' => Yii::t('common', 'UF'),
            'city' => Yii::t('common', 'City'),
            'neighborhood' => Yii::t('common', 'Neighborhood'),
            'address' => Yii::t('common', 'Address'),
        ];
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->username = $model->username;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        return $this->model;
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->email = $this->email;
            $model->status = $this->status;
            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());

            if ($this->roles && is_array($this->roles)) {
                foreach ($this->roles as $role) {
                    $auth->assign($auth->getRole($role), $model->getId());
                }
            }

            return !$model->hasErrors();
        }
        return null;
    }
}
