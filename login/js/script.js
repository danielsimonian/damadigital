function formatarMoeda(valor) {
  // Remove tudo que não é número
  valor = valor.replace(/\D/g, "");

  // Divide por 100 para adicionar as casas decimais
  valor = (valor / 100).toFixed(2) + "";

  // Substitui o ponto por vírgula
  valor = valor.replace(".", ",");

  // Adiciona os pontos de milhar
  valor = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
  
  return valor;
}

function removerMascara(valor) {
  // Remove os pontos de milhar e troca vírgula por ponto
  return valor.replace(/\./g, "").replace(",", ".");
}

// Campo de input
const input = document.getElementById("money");

// Aplica a formatação ao digitar
input.addEventListener("input", (e) => {
  const valorFormatado = formatarMoeda(e.target.value);
  e.target.value = valorFormatado;
});
