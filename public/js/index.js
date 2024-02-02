document.addEventListener("DOMContentLoaded", function () {
    //table
    function telephoneTableEvents() {
        let tabelaPricipal = document.getElementById("telefone-descricao");
        let addTabelaTelefone = document.getElementById(
            "adicionar-linha-telefone"
        );

        const dateExist = typeof dados != "undefined";

        if (dateExist) {
            for (let i = 0; i <= dados.length - 1; i++) {
                tabelaPricipal.insertAdjacentHTML(
                    "beforeend",
                    `
                   <tr>
                       ${
                           i == 0
                               ? `<td><input type="text" id="telefone" class="telefone" name="telefone[${i}][telefone]" value="${dados[i].telefone}"></td>`
                               : `<td><input type="text" class="telefone" name="telefone[${i}][telefone]" value="${dados[i].telefone}"></td>`
                       }
                       <td><input type="text" name="telefone[${i}][descricao]" value="${
                        dados[i].descricao
                    }"></td>
                   </tr>
    
        `
                );
            }
        } else {
            for (let i = 0; i <= 5; i++) {
                tabelaPricipal.insertAdjacentHTML(
                    "beforeend",
                    `
                   <tr>
                       ${
                           i == 0
                               ? `<td><input type="text" id="telefone" class="telefone" name="telefone[${i}][telefone]""></td>`
                               : `<td><input type="text" class="telefone" name="telefone[${i}][telefone]"></td>`
                       }
                       <td><input type="text" name="telefone[${i}][descricao]"></td>
                   </tr>
    
        `
                );
            }
        }

        addTabelaTelefone.addEventListener("click", () => {
            tabelaPricipal.insertAdjacentHTML(
                "beforeend",
                `
                        <tr>
                            <td><input type="text" name="telefone[${tabelaPricipal.childElementCount}][telefone]" class="telefone"></td>
                            <td><input type="text" name="telefone[${tabelaPricipal.childElementCount}][descricao]"></td>
                        </tr>
            
            `
            );
        });
    }

    //CEP
    function foundCep() {
        const cep = document.getElementById("cep");
        const logradouro = document.getElementById("logradouro");
        const complemento = document.getElementById("complemento");
        const setor = document.getElementById("setor");
        const cidade = document.getElementById("cidade");
        const uf = document.getElementById("uf");

        if (cep != undefined) {
            cep.addEventListener("input", async () => {
                try {
                    if (String(cep.value).length == 10) {
                        const newCep = cep.value.replace(/\D/g, "");

                        const response = await fetch(
                            `https://viacep.com.br/ws/${newCep}/json`
                        );

                        if (!response.ok) {
                            throw await response.json();
                        }

                        const data = await response.json();

                        logradouro.value = data.logradouro;
                        complemento.value = data.complemento;
                        setor.value = data.bairro;
                        cidade.value = data.localidade;
                        uf.value = data.uf;
                    }
                } catch (e) {
                    console.log(e);
                }
            });
        } else {
            cep.value = "";
        }
    }

    function modelarValores() {
        const rg = document.getElementById("rg");
        rg.maxLength = 13;
        const cpf = document.getElementById("cpf");
        cpf.maxLength = 14;
        const cep = document.getElementById("cep");
        cep.maxLength = 10;
        // const tableTelephones = document.getElementsByClassName(".telefone");

        rg.addEventListener("input", () => {
            rg.value = rg.value.replace(/\D/g, "");
            rg.value = rg.value.replace(
                /(\d{2})(\d{3})(\d{3})(\d{1})$/,
                "$1.$2.$3-$4"
            );
        });

        cpf.addEventListener("input", () => {
            cpf.value = cpf.value.replace(/\D/g, "");
            cpf.value =
                String(cpf.value).length <= 6
                    ? cpf.value.replace(/(\d{3})(\d{1})/, "$1.$2")
                    : String(cpf.value).length >= 7 &&
                      String(cpf.value).length <= 9
                    ? cpf.value.replace(/(\d{3})(\d{3})(\d{1})/, "$1.$2.$3")
                    : cpf.value.replace(
                          /(\d{3})(\d{3})(\d{3})(\d{1})/,
                          "$1.$2.$3-$4"
                      );
        });

        cep.addEventListener("input", () => {
            cep.value = cep.value.replace(/\D/g, "");
            cep.value =
                String(cep.value).length < 6
                    ? cep.value.replace(/(\d{2})(\d{1})/, "$1.$2")
                    : cep.value.replace(/(\d{2})(\d{3})(\d{1})/, "$1.$2-$3");
        });

        // tableTelephones.addEventListener("input", () => {
        //     console.log(tableTelephones.value);
        //     tableTelephones.forEach((input) => {
        //         console.log(input.value);
        //     });
        // });
    }

    telephoneTableEvents();
    foundCep();
    modelarValores();
});
