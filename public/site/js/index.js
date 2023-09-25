document.addEventListener("DOMContentLoaded", function() {
  function atualizarRelogio() {
    const relogioElemento = document.getElementById('clock');
    const agora = new Date();
    const hora = agora.getHours().toString().padStart(2, '0');
    const minutos = agora.getMinutes().toString().padStart(2, '0');
    relogioElemento.textContent = `${hora}:${minutos}`;
  }

  // Atualiza o relógio a cada segundo
  setInterval(atualizarRelogio, 1000); // 1s

  // Chama a função inicialmente para evitar atraso na exibição
  atualizarRelogio();

  function atualizarData() {
    const dataElemento = document.getElementById('date');
    const diaSemanaElemento = document.getElementById('weekday');

    // Pega a data atual
    var hoje = new Date();
    // Obtém o dia, mês e ano
    var dia = hoje.getDate();
    var diaDaSemana = hoje.getDay();
    var nomesDiasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
    var nomeDia = nomesDiasSemana[diaDaSemana];

    var mes = hoje.getMonth() + 1; // Os meses começam em 0 (janeiro) até 11 (dezembro)
    var ano = hoje.getFullYear();
    
    // Formata o dia e o mês para terem sempre dois dígitos
    if (dia < 10) {
        dia = '0' + dia;
    }
    
    if (mes < 10) {
        mes = '0' + mes;
    }

    // Monta a data no formato dd/mm/yyyy
    var dataFormatada = dia + '/' + mes + '/' + ano;
    dataElemento.textContent = dataFormatada;

    diaSemanaElemento.textContent = nomeDia;
  }

  // Atualiza a data a cada segundo
  setInterval(atualizarData, 1000*60*60*24); // 24hrs

  atualizarData()
});