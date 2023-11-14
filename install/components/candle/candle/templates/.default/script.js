function processForm(e) {
    e.preventDefault();
    const modalBody = document.getElementById('modal__text');
    while (modalBody.firstChild) {
        modalBody.removeChild(modalBody.firstChild); // Очищяем форму
    }
// Отправляем Action запрос в компнент candle:candle для добавлениея записи в orm таблицу
    BX.ajax.runComponentAction("candle:candle", "addTable", {
        mode: "class",
        data: {
            "NAME": e.target.elements.NAME.value,
            "COMMENT": e.target.elements.NUMBER.value,
            "SURNAME": e.target.elements.SURNAME.value,
            "NUMBER": e.target.elements.NUMBER.value,
            "ACCESS": e.target.elements.ACCESS.value,
        }
    }).then(function (response) {
        var modal = document.getElementById('myModal');
        modal.style.display = "flex";

        // Обрабатываем ответ от сервера
        if (response.data.status == 'error') {
            // Добавление ошибок
            for (var key in response.data.errors) {
                const div = document.createElement("div");
                div.innerHTML = response.data.errors[key];
                modalBody.appendChild(div);
            }
        }
        // В случае успеха выводит сообщение
        if (response.data.status == 'success') {
            const div = document.createElement("div");
            div.innerHTML = response.data.message;
            modalBody.appendChild(div);
        }

    });

}


window.addEventListener("DOMContentLoaded", (event) => {
    var form = document.getElementById('candle__form');
    console.log(form);
    form.addEventListener("submit", processForm);

    // Модальное окно
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});