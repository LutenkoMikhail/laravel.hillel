01-37-25

Account -> OrderController
$orders = Order::where('user_id', $user->id)->paginate(3);

У пользователя же есть scope orders() в моделе. Почему не вывести Auth()->user()->orders()....
Account -> UserController
обновление данных пользователя (да и всего впринципе) можно делать проще.
$user->update($request->validated())

Только предварительно надо создать UserUpdateRequest и в нем прописать правила. Так обычно принято
public function index(User $user) // А зачем тут пользователя принимать?
{
    return view('account.index');
}

не понимаю зачем создан RegisterController в Http/Controllers. он же есть в Auth папке
еще не вижу проверки на админа для админовских роутов
Подправьте как будет время)

------------------------------------------------------

Домашнее задание 36
Добавлено: 31.08.2019 20:34
Shop Cart
Доделываем предыдущие задания!

Подключаем сброшенный в описании урока пакет и создаем
 полноценный функционал для работы с корзиной.

Добавить в корзину
Обновить кол-во продукта в корзине
Удалить продукт с корзины
Сохранить данные корзины пользователя если он выходит с аккаунта
Восстановить данные корзины пользователя если он логинится
Делаем возможность создания заказов.

https://packagist.org/packages/bumbummen99/shoppingcart


