# Support: обращения с вложениями для Webasyst

Учебное приложение для собеседования: клиент создаёт обращение с вложением и комментирует его, делится публичной ссылкой; сотрудник смотрит обращение и меняет статус.

## Структура

```
wa-apps/support/
├── lib/
│   ├── config/        app.php, db.php, routing.php, права, конфиг приложения
│   ├── models/        supportTicketModel, supportAttachmentModel, supportCommentModel
│   ├── classes/       supportAccess, supportWorkflow
│   └── actions/
│       ├── frontend/  личный кабинет: список, создание, карточка, комментарий, файл; публичная страница
│       └── backend/   карточка и обновление обращения для сотрудника
├── templates/         Smarty-шаблоны «Мои обращения» и публичной страницы
└── js/support.js      поиск и создание (jQuery)
```

## Маршруты

| URL | Обработчик |
|---|---|
| `my/support/` | `supportFrontendMyTicketsAction`, страница «Мои обращения» |
| `my/support/list/?q=&page=&limit=` | `supportFrontendListController`, JSON-список обращений |
| `my/support/create/` | `supportFrontendCreateController`, создание (POST: `subject`, `body`, файл `attachment`) |
| `my/support/<id>/` | `supportFrontendTicketController`, JSON-карточка с комментариями и вложениями |
| `my/support/comment/` | `supportFrontendCommentController`, комментарий (POST: `ticket_id`, `body`) |
| `my/support/file/<id>/` | `supportFrontendFileController`, скачивание вложения |
| `support/t/<token>/` | `supportFrontendPublicAction`, публичная страница по ссылке |

Бэкенд: `support/?module=backend&action=ticket&id=<id>`, `support/?module=backend&action=update` (POST).

## Фреймворк

Исходники Webasyst: https://github.com/webasyst/webasyst-framework

## Задание

См. [TASK.md](TASK.md).
