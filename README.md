## Local deployment
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- Clone project repo
- Run one of the required commands below

```bash
docker compose -f docker-compose.local.yml up -d
```

### Access locally deployed services
- [Laravel project](http://localhost:8080/)
- [PGAdmin](http://localhost:8081/)

---

## 📘 Swagger документация

Swagger UI доступен по адресу:

👉 http://localhost:8080/swagger

Документация содержит:
- все доступные параметры фильтрации
- параметры сортировки (`orders[...]`)
- структуру ответа
- примеры запросов

Рекомендуется использовать Swagger UI для тестирования endpoint'а.

## 📌 Реализовано

Реализован HTTP endpoint:

👉 `GET /api/v1/products`

Функциональность:
- поиск по товарам
- фильтрация
- сортировка
- пагинация

---

## 🔍 Фильтрация

Поддерживаются следующие фильтры (через query-параметры `filters[...]`):

- `filters[q]` — поиск по названию товара
- `filters[price_from]`, `filters[price_to]` — диапазон цены
- `filters[category_id]` — фильтр по категории
- `filters[in_stock]` — наличие товара (true/false)
- `filters[rating_from]` — минимальный рейтинг

---

## ↕️ Сортировка

Используется формат:

```http
orders[field]=asc|desc
```

Поддерживаемые поля:

- `orders[price]`
- `orders[rating]`
- `orders[created_at]`