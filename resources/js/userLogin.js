import "./bootstrap";
// import { saveAs } from 'file-saver';
import "../sass/_userLogin.scss";
// import Excel from 'exceljs';
function getCurrentDate() {
    let today = new Date();
    let day = today.getDate();
    let month = today.getMonth() + 1;
    let year = today.getFullYear();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    let currentDate = year + "-" + month + "-" + day;
    return currentDate;
}
let currentDate = getCurrentDate();
document.getElementById("validationDate").value = currentDate;
document.getElementById("validationDate").max = currentDate;
$(document).ready(function () {
    $({ property: 0 }).animate(
        { property: 105 },
        {
            duration: 1000,
            step: function () {
                let _percent = Math.round(this.property);
                $("#progress").css("width", _percent + "%");
                if (_percent == 105) {
                    $("#progress").addClass("done");
                }
            },
            complete: function () {},
        }
    );
    $("#loginForm").on("submit", function (event) {
        event.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
            url: "{{ route('user.login') }}",
            type: "GET",
            data: formData,
            success: function (response) {
                if (response.message) {
                    $("#message2").html(`
            <div class="alert alert-danger" role="alert">
              ${response.message}
            </div>
          `);
                } else {
                    window.location.href = "{{ route('User.MainPage') }}";
                }
            },
        });
    });
    $("#register").on("click", function () {
        document.getElementById("right").style.display = "none";
        document.getElementById("left").style.display = "block";
    });
    $("#login").on("click", function () {
        document.getElementById("left").style.display = "none";
        document.getElementById("right").style.display = "block";
    });
});
(() => {
    "use strict";
    const forms = document.querySelectorAll(".needs-validation");
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
$("#regisForm").on("submit", function (event) {
    event.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: "{{ route('user.register') }}",
        type: "POST",
        data: formData,
        success: function (response) {
            if (response.message) {
                $("#message1").html(`
            <div class="alert alert-dark" role="alert">
              ${response.message}
            </div>
          `);
            } else {
                window.location.href = "{{ route('User.MainPage') }}";
            }
        },
    });
});
// const wb = new Excel.Workbook();
// const ws = wb.addWorksheet("My Sheet");
// const headers = [
//     { header: "First name", key: "fn", width: 15 },
//     { header: "Last name", key: "ln", width: 15 },
//     { header: "Occupation", key: "occ", width: 15 },
//     { header: "Salary", key: "sl", width: 15 },
// ];
// ws.columns = headers;
// ws.addRow(["John", "Doe", "gardener", 1230]);
// ws.addRow(["Roger", "Roe", "driver", 980]);
// ws.addRow(["Lucy", "Mallory", "teacher", 780]);
// ws.addRow(["Peter", "Smith", "programmer", 2300]);
// ws.getColumn("A").style.alignment = { vertical: "middle", horizontal: "left" };
// ws.getColumn("B").style.alignment = { vertical: "middle", horizontal: "left" };
// ws.getColumn("C").style.alignment = { vertical: "middle", horizontal: "left" };
// ws.getColumn("D").style.alignment = { vertical: "middle", horizontal: "right" };
// ws.getRow(1).style.alignment = { vertical: "middle", horizontal: "center" };
// wb.xlsx
//     .writeBuffer()
//     .then((buffer) => saveAs(new Blob([buffer]), `${Date.now()}_feedback.xlsx`))
//     .catch((err) => console.log("Error writing excel export", err));
