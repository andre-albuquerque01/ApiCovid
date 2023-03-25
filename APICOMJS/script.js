var button = document.querySelector('#button_covid')
// let confirmed = document.querySelector("#resultConfirm")
function LookupCovidData() {
    let deads = document.querySelector("#resultDeads")
    const formatNumber = new Intl.NumberFormat()
    let dead = 0;
    let confirm = 0;
    country = document.forms['select-country']['country'].value;
    let url = `https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${country}`;
    fetch(url).then(
        (data) => {
            return data.json();
        }
    ).then(function (result) {
        dados = (Object.values(result)).map(obj => obj);
        for (var i = 0; i < dados.length; i++) {
            // Soma dos casos confirmados
            confirm += dados[i].Confirmados;
            // Soma dos obitos
            dead += dados[i].Mortos;
            // Passando para o html os valores
            deads.innerHTML = "Os casos confirmados são " + formatNumber.format(confirm) + " e os obitosa são " + formatNumber.format(dead) + " no país " + country
        }
    }).catch(function (err) {
        console.log(err);
    }
    )
}
button.addEventListener('click', LookupCovidData);



// var country = document.querySelector('input[name="country"]:checked').value
function setData() {
    let country = document.forms['select-country']['country'].value;
    console.log(country)
    var data = document.querySelector('#data').value
    $.ajax({
        url: "processa.php",
        type: 'GET',
        dataType: 'html',
        data: { "country": country, "data": data },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            console.log(status);
            console.log(error);
        },
        success: function (result) {
            // console.log(result);
        }
    });
    country = "";
}
button.addEventListener('click', setData);

document.getElementById("button_covid").addEventListener("click", function() {
    // Obter o valor do país a ser pesquisado
    let country = document.forms['select-country']['country'].value;
  
    // Realizar a requisição AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search.php?country=" + country, true);
    xhr.onload = function() {
      // Se a requisição retornar com sucesso, exibir os resultados na tela
      if (xhr.status === 200) {
        var resultDiv = document.querySelector("#result");
        resultDiv.innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  });