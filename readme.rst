Проект использует Codeigniter 3, и RestController. База данных приложена в файле recipe_book.sql.
Методы в контроллере:
list_recipe_get() - получает полный список рецептов.
full_recipe_get($id) - получает рецепт по ID. Переведен в json с помощью json_encode.
ingredients_recipe_get($id) - получает список ингредиентов рецепта по его ID.
list_ingredients_get() - получает полный список ингредиентов.
full_ingredients_get($id) - получает ингредиент по ID.
ingredient_add_post() - добавляет ингредиент, получая в body name и measure_ID. Проверяет на присутствие обоих, и наличие measure_ID в таблице мер.
ingredient_del_delete($id) - удаляет ингредиент по ID.
