let collapseButton = document.getElementById('collapse-btn');
let collapseHeader = document.getElementById('collapse-header');
let collapseContainer = document.getElementById('collapse-container');
let collapse = document.getElementById('collapse');

collapseButton.onclick = function () {
    if (window.screen.width >= 325 && window.screen.width <= 1024) {
        if (collapse.style.display == 'block') {
            collapseContainer.style.marginTop = '0';
            collapseHeader.style.zIndex = '5';
            collapse.style.display = 'none';
        } else {
            collapse.style.display = 'block';
            collapseHeader.style.zIndex = '20';
            collapseContainer.style.marginTop = '120px';
        }
    }
}

function questions() {
    const questions = [
        {
            question: '¿Qué es un titulo de crédito hipotecario negociable?',
            answer: 'Es el título valor por el cual una persona puede hipotecar o poner como garantía al solicitar un préstamo, esta garantía se registra y transfiere los derechos al prestamista, hasta pagar la totalidad de la deuda generada por el préstamo. Inscrita bajo la Ley Nro. 26702 de diciembre de 1996, artículo 239 Consagrada por la Ley General del Sistema Financiero y la SBS.'
        },
        {
            question: '¿Qué es un préstamo con garantía hipotecaria',
            answer: 'Son préstamos o créditos que se solicitan dejando un inmueble como garantía. Se denominan así porque se firma una garantía a nombre del prestamista sobre tu inmueble, solo debes poder demostrar que podrás afrontar el pago de toda la deuda sin poner en riesgo tu patrimonio personal, por ello somos más flexibles que el proceso de aprobación de la banca tradicional. Este un préstamo en efectivo y s diferencia del crédito hipotecario de la banca, este tipo de préstamo es libre, lo puedes usar para lo que necesites, como realizar pagos pendientes que tienes en la banca, comprar un nuevo bien o hasta invertir en tu negocio.'
        },
        {
            question: '¿Qué tipo de inmuebles aplican para solicitar un préstamo?',
            answer: 'Cual tipo de inmueble inscrito en SUNARP que se encuentre en el distrito de La Libertad. Definido como inmueble construido, inmueble sin construir (terreno) o Local comercial.'
        },
        {
            question: '¿Qué tasas de interés manejamos?',
            answer: 'Las tasas son flexibles y se manejan de acuerdo al monto de dinero solicitado, pero fluctúan entre el 19% y 64%. Esta incluye la tasa de interés mensual, la comisión de los servicios prestados por NEXO CASH, gastos notariales y registrales (TCEA).'
        },
        {
            question: '¿Cuál es el monto de inversión?',
            answer: 'El monto mínimo, tanto para una inversión o préstamo, es de S/. 20,000.'
        },
        {
            question: '¿Qué es la TCEA?',
            answer: 'La TCEA o Tasa de Costo Efectivo Anual representa el costo total del crédito. Es decir, es la tasa que te permitirá saber cuál será el costo total que deberás pagar al solicitar un crédito hipotecario. Además de los intereses, incluye comisiones, seguros, gastos notariales, registrales y otros gastos administrativos.'
        }
    ]

    const questionInfoDiv = document.getElementById('question-info')
    const allDiv = document.createElement('div');

    allDiv.innerHTML = `
        ${questions.map((question, index) =>
        `
                <div class="accordion">
                    <div class="accordion__action">
                        <p class="accordion__action__title">
                            ${question.question}
                        </p>
                        <div class="accordion__action__arrow"></div>
                    </div>
                    <div class="accordion__panel">
                        <p class="accordion__panel__description">
                            ${question.answer}
                        </p>
                    </div>
                </div>
            `
    ).join('')}
    `;
    questionInfoDiv.append(allDiv);


    var accordionAction = document.getElementsByClassName("accordion__action");

    for (var i = 0; i < accordionAction.length; i++) {
        accordionAction[i].addEventListener("click", function () {
            var panel = this.nextElementSibling;
            var accordion = panel.parentNode;
            if (panel.style.display === "block") {
                accordion.style.height = '100px';
                panel.style.display = "none";
            } else {
                accordion.style.height = 'auto';
                panel.style.display = "block";
            }
        });
    }
}


questions();