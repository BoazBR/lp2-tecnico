// 11. Fazer um algoritmo que armazene um número inteiro de sua escolha e e armazene em 
// outras duas variáveis o seu sucessor e o seu antecessor, utilizando os operadores de incremento 
// ( ++ ) e decremento ( -- ).
var inteiro = 10
var inteiroMais1 = inteiro++
var inteiroMenos1 = inteiro--
console.log(inteiroMais1)
console.log(inteiroMenos1)

// 12. Faça um algoritmo que armazene dois valores inteiros representando, 
// respectivamente um valor de hora e um de minutos atuais. 
// Calcule e armazene em outra variável quantos minutos se passaram desde o início do dia.

var n1 = 10
var n2 = 20
var horasEMminutos = n1 * 60
var minutosPassados = horasEMminutos+n2
console.log(minutosPassados)


// 13. Faça um algoritmo que armazene horário de entrada (hora e minuto) e o horário de 
// saída (hora e minuto) de um empregado e depois calcule e armazene em outra variável quantos 
// minutos foi trabalhado.

var entradah = 10:30
var entradamin = 20
var saidah = 14
var saidamim = 50
var tempotrabalhado = 
console.log(entradah)


// 18. Software financeiro para restaurante.
// *
// Parabéns... Você acaba de ser contratado(a) como desenvolvedor(a) de soluções em software para um restaurante. 
// O seu primeiro trabalho, será desenvolver um software que calcule automaticamente o valor da conta com base nos itens que 
// foram consumidos. Para isso, o usuário irá fornecer para o software a quantidade de cada item que foi consumido. Caso algum 
// item não tenha sido consumido, o usuário irá informar o valor 0 (zero) para aquele item. A quantidade de cada item deve ser 
// informada, obrigatoriamente. Com base no valor de cada item, e no quantitativo informado pelo usuário, o software deve calcular 
// o valor total da conta. Abaixo estão os valores de cada item. Lembrando que, na conta, deve ser incluído 10% referente ao valor 
// a ser pago para o garçom. Então, o software deve exibir o valor dos itens consumidos, o valor do garçom e o valor total da conta.

// Refeição: R$ 15,50
// Refrigerante: R$ 2,50
// Água Mineral: R$ 2,00
// Sobremesa: R$ 5,00

var refeicao = Number(prompt("Qual foi o número de refeições consumidas"))
var refri = Number(prompt("Qual foi o número de refrigerantes consumido"))
var agua = Number(prompt("Qual foi o número de água mineral consumida"))
var sobremesa = Number(prompt("Qual foi o número de sobremesas consumidas"))

const REFEICAO = 15.50
const REFRI = 2.50
const AGUA = 2.00
const SOBRE = 5.00

var totalref = refeicao*REFEICAO 
var totalrefri = refri*REFRI 
var totalagua = agua*AGUA 
var totalsobre = sobremesa*SOBRE
var total = totalref + totalrefri + totalagua + totalsobre
var gorgeta = total*0.1

console.log("Descrição da conta")
console.log( refeicao +"refeição a " + REFEICAO " = " + totalref)
console.log( refri +"refrigerante/s a " + REFRI " = " + totalrefri)
console.log( agua +"água/s a " + AGUA " = " + totalagua)
console.log( sobremesa +"sobremesa/s a " + SOBRE " = " + totalsobre)
console.log( )
