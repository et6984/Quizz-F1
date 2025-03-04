    let timer;
    let timeLeft = 30;

    function stopClick(c) {
        c.stopPropagation();
        c.preventDefault();
    }

    function startTimer() {
        timer = setInterval(function () {
            if (timeLeft < 0) {
                clearInterval(timer);
                alert("Temps écoulée ! ");
            } else {
                document.getElementById('timer').innerText = "Temps restant : " + timeLeft + "s";
                timeLeft--;
            }
        }, 1000);
    }
    startTimer();

    function fetchQuestion() {
        fetch('php/get_question.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('question').innerText = data.question;
            let choices = document.querySelectorAll('.choice');
            choices.forEach((choice, index) => {
                choice.innerText = data.choices[index];
            });
            let reponse = data.correct;
            choices.forEach((choice, index) => {
                choice.addEventListener('click', function () {
                    if (choice.textContent == reponse) {
                        choice.style.backgroundColor = 'green';
                        choices.forEach((choice) => choice.addEventListener('click', stopClick, true));
                        fetch('./php/save_score.php?point=' + 1);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        choice.style.backgroundColor = 'black';
                        choices.forEach((choice) => choice.addEventListener('click', stopClick, true));
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                });
            });
            })
            .catch(error => console.error('Erreur : ', error));
    }
    fetchQuestion();

    function selectChoice() {
        fetch('php/get_question.php')
            .then(response => response.json())
            .then(data => {
                let reponse = data.correct;
            })
            .catch(error => console.error('Erreur : ', error));

        let choices = document.querySelectorAll('.choice');
    }
    selectChoice();