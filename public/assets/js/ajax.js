var availableDate = document.querySelectorAll('.available-date');

availableDate.forEach((item)=>{
    item.addEventListener('change', async () => {
        let dataJson = JSON.parse(item.value);
        let req = await fetch(dataJson.url+'/api/agendamentos/'+dataJson.idProfissional+'/'+dataJson.data);
        let json = await req.json();
        //console.log(json);
    });
});


async function availableTime(url, idProfissional) {
    let availableDate = document.getElementById('available-date').value;
    let availableTime = document.getElementById('available-time');
	console.log(availableDate);
    let req = await fetch(url+'/api/agendamentos');
    let json = await req.json();
    //console.log(json);
}