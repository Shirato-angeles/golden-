import {
  onGetRecervas,
  saveReceva,
  getRecervas,
  deleteRecervas,
  updateRecervas,
} from "../../database/firebase.js";

alert("prueba de conexión");

const recervaForm = document.getElementById("recerva-form");
const recervaContainer = document.getElementById("recerva-container");

let editStatus = false;
let id = "";

window.addEventListener("DOMContentLoaded", async (e) => {
  const querySnapshot = await getRecervas();
  querySnapshot.forEach((doc) => {
    console.log(doc.data());
  });

  onGetRecervas((querySnapshot) => {
    recervaContainer.innerHTML = "";

    querySnapshot.forEach((doc) => {
      const recerva = doc.data();

      recervaContainer.innerHTML += `
			<div class="award-winning-hotel">
                <h1> lista de Recervaciones</h1>
                <div class="book-section2">
                    <th>
                        <tl style="margin-left: 5px; margin-right:10px; font-size:25px;">llegada a Hotel<br /> ${recerva.llegada}
                        </tl>
                        <tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Salida del Hotel <br /> ${recerva.partida}
                        </tl>
                        <tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Habitación <br />
                            ${recerva.number}</tl>
                        <tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Tipo de Habitación <br /> ${recerva.habitacion}
                        </tl>
                        <tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Adultos <br /> ${recerva.adultos}
                        </tl>
                        <tl style="margin-left: 0px; margin-right:10px; font-size:25px;">Numero de Niños <br /> ${recerva.ninos}
                        </tl>
                    </th>
                </div>
            </div>
			`;
    });
    const btnsDelete = tasksContainer.querySelectorAll(".btn-delete");
    btnsDelete.forEach((btn) =>
      btn.addEventListener("click", async ({ target: { dataset } }) => {
        try {
          await deleteRecervas(dataset.id);
        } catch (error) {
          console.log(error);
        }
      })
    );
  });
});

recervaForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const llegada = recervaForm["llegada"];
  const partida = recervaForm["partida"];
  const habitacion = recervaForm["habitacion"];
  const tipo = recervaForm["tipo"];
  const adultos = recervaForm["adultos"];

  try {
    if (!editStatus) {
      await saveReceva(
        habitacion.value,
        llegada.value,
        partida.value,
        tipo.value,
        adultos.value,
        ninos.value,
        number.value
      );
    } else {
      await updateRecervas(id, {
        habitacion: habitacion.value,
        llegada: llegada.value,
        partida: partida.value,
        tipo: tipo.value,
        adultos: adultos.value,
        ninos: ninos.value,
        number: number.value,
      });

      editStatus = false;
      id = "";
      taskForm["btn-recervar"].innerText = "Save";
    }

    taskForm.reset();
    title.focus();
  } catch (error) {
    console.log(error);
  }
});
