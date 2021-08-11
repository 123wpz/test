DROP TABLE IF EXISTS `tbl_test`;

CREATE TABLE IF NOT EXISTS `tbl_user`
(
    `id`             VARCHAR(64)  NOT NULL,
    `token`        VARCHAR(100) NULL COMMENT 'token',
    `create_time`    BIGINT       NOT NULL COMMENT '注册时间',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    COMMENT = '测试表，进行composer测试的表';