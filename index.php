<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SHADOW API Tester</title>

<style>

body {
    margin: 0;
    min-height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;

    font-family: Arial, sans-serif;

    background: #0f172a;
    color: white;
}

.box {
    width: 90%;
    max-width: 420px;

    padding: 30px;

    background: #1e293b;

    border-radius: 18px;

    text-align: center;
}

input {
    width: 100%;
    padding: 14px;

    margin-top: 15px;

    border: none;
    border-radius: 10px;

    background: #0f172a;
    color: white;

    box-sizing: border-box;
}

button {
    width: 100%;

    margin-top: 15px;
    padding: 14px;

    border: none;
    border-radius: 10px;

    background: #2563eb;

    color: white;
    font-weight: bold;
}

#result {
    margin-top: 20px;
    padding: 15px;

    border-radius: 10px;

    background: #0f172a;

    display: none;
}

.valid {
    color: #4ade80;
}

.invalid {
    color: #f87171;
}

pre {
    text-align: left;
    white-space: pre-wrap;
    word-break: break-word;
}

</style>

</head>

<body>

<div class="box">

<h2>SHADOW API TESTER</h2>

<input
    type="text"
    id="key"
    placeholder="SHADOW-XXXX-XXXX"
>

<button onclick="checkKey()">
CHECK KEY
</button>

<div id="result"></div>

</div>

<script>

async function checkKey() {

    const key =
        document.getElementById("key").value.trim();

    const result =
        document.getElementById("result");

    if (!key) {

        result.style.display = "block";

        result.innerHTML =
            '<span class="invalid">Masukkan API Key.</span>';

        return;
    }

    result.style.display = "block";

    result.innerHTML = "Checking...";

    try {

        const response = await fetch(
            "https://shadowxdd.gamer.gd/api/check.php?key="
            + encodeURIComponent(key)
        );

        const data = await response.json();

        if (data.success === true) {

            result.innerHTML = `
                <span class="valid">
                    ✓ API KEY VALID
                </span>

                <pre>${JSON.stringify(
                    data,
                    null,
                    2
                )}</pre>
            `;

        } else {

            result.innerHTML = `
                <span class="invalid">
                    ✕ API KEY INVALID
                </span>

                <pre>${JSON.stringify(
                    data,
                    null,
                    2
                )}</pre>
            `;
        }

    } catch (error) {

        result.innerHTML = `
            <span class="invalid">
                Gagal menghubungi API.
            </span>
        `;

        console.error(error);

    }

}

</script>

</body>

</html>