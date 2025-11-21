document.getElementById("state").addEventListener("change", function () {
    let stateID = this.value;

    fetch("api/dropdown.php?type=district&id=" + stateID)
        .then(response => response.json())
        .then(data => {
            let district = document.getElementById("district");
            district.innerHTML = "<option>Select District</option>";

            data.forEach(row => {
                district.innerHTML += `<option value="${row.no}">${row.name}</option>`;
            });

            document.getElementById("college").innerHTML = "<option>Select College</option>";
        });
});

document.getElementById("district").addEventListener("change", function () {
    let districtID = this.value;

    fetch("api/dropdown.php?type=college&id=" + districtID)
        .then(response => response.json())
        .then(data => {
            let college = document.getElementById("college");
            college.innerHTML = "<option>Select College</option>";

            data.forEach(row => {
                college.innerHTML += `<option value="${row.no}">${row.name}</option>`;
            });
        });
});
