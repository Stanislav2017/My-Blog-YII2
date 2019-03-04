<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $confirm_password;
    public $avatar;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique',
                'targetClass' => '\app\models\User',
                'message' => 'This username has already been taken.'
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique',
                'targetClass' => '\app\models\User',
                'message' => 'This email address has already been taken.'
            ],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['confirm_password', 'required'],
            ['confirm_password', 'compare',
                'compareAttribute' => 'password',
                'message' => "Passwords don't match"
            ]
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->generateAuthKey();
        $user->setPassword($this->password);
        $user->email = $this->email;
        $user->status = User::STATUS_WAIT;
        $user->is_admin = User::POSITION_USER;

        if(!$user->save()){
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
}