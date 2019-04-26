<?php

namespace wodrow\yii2wadmin\models\tables;

use Yii;

/**
 * This is the model class for table "{{%admin_role_user}}".
 *
 * @property int $id
 * @property string $admin_role_id
 * @property string $user_id
 *
 * @property AdminRole $adminRole
 */
class AdminRoleUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_role_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_role_id', 'user_id'], 'required'],
            [['admin_role_id', 'user_id'], 'integer'],
            [['admin_role_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminRole::className(), 'targetAttribute' => ['admin_role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'admin_role_id' => Yii::t('app', 'Admin Role ID'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminRole()
    {
        return $this->hasOne(AdminRole::className(), ['id' => 'admin_role_id']);
    }
}
