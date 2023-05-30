create table user_info
(
    id          int unsigned auto_increment
        primary key,
    ip_address  varchar(45)                          not null,
    user_agent  varchar(255)                         null,
    view_date   datetime default current_timestamp() null on update current_timestamp(),
    page_url    varchar(255)                         null,
    views_count int      default 1                   null,
    constraint user_info_pk2
        unique (ip_address, user_agent, page_url)
);
INSERT INTO test.user_info (id, ip_address, user_agent, view_date, page_url, views_count)
VALUES (1, '192.168.32.1',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
        '2023-05-30 13:47:16', '/index1.html', 3);
INSERT INTO test.user_info (id, ip_address, user_agent, view_date, page_url, views_count)
VALUES (2, '192.168.32.1',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
        '2023-05-30 13:47:31', '/index2.html', 3);