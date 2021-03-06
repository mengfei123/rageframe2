<?php

use yii\db\Migration;

class m181110_033945_api_log extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%api_log}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'member_id' => 'int(11) NULL DEFAULT \'0\' COMMENT \'用户id\'',
            'method' => 'varchar(20) NULL DEFAULT \'\' COMMENT \'提交类型\'',
            'module' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'模块\'',
            'controller' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'控制器\'',
            'action' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'方法\'',
            'url' => 'varchar(1000) NULL DEFAULT \'\' COMMENT \'提交url\'',
            'get_data' => 'text NULL COMMENT \'get数据\'',
            'post_data' => 'longtext NULL COMMENT \'post数据\'',
            'ip' => 'varchar(16) NULL DEFAULT \'\' COMMENT \'ip地址\'',
            'req_id' => 'varchar(50) NULL DEFAULT \'\' COMMENT \'对外id\'',
            'error_code' => 'int(10) NULL DEFAULT \'0\' COMMENT \'报错code\'',
            'error_msg' => 'varchar(200) NULL DEFAULT \'\' COMMENT \'报错信息\'',
            'error_data' => 'longtext NULL COMMENT \'报错日志\'',
            'status' => 'tinyint(4) NOT NULL DEFAULT \'1\' COMMENT \'状态(-1:已删除,0:禁用,1:正常)\'',
            'created_at' => 'int(10) NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NULL DEFAULT \'0\' COMMENT \'修改时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='api_接口日志'");
        
        /* 索引设置 */
        $this->createIndex('error_code','{{%api_log}}','error_code',0);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%api_log}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

