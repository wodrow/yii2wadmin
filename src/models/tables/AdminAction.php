<?php

namespace wodrow\yii2wadmin\models\tables;

use Yii;

/**
 * This is the model class for table "{{%admin_action}}".
 *
 * @property string $id
 * @property string $route
 * @property string $menu_name
 * @property string $parent_id
 *
 * @property AdminAction $parent
 * @property AdminAction[] $adminActions
 * @property AdminRoleAdminAction[] $adminRoleAdminActions
 */
class AdminAction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin_action}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route'], 'required'],
            [['parent_id'], 'integer'],
            [['route'], 'string', 'max' => 150],
            [['menu_name'], 'string', 'max' => 50],
            [['route'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdminAction::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'route' => Yii::t('app', 'Route'),
            'menu_name' => Yii::t('app', 'Menu Name'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(AdminAction::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminActions()
    {
        return $this->hasMany(AdminAction::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdminRoleAdminActions()
    {
        return $this->hasMany(AdminRoleAdminAction::className(), ['admin_action_id' => 'id']);
    }
}
