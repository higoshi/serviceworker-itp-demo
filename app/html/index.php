<!doctype html>
<ul id="ul">
</ul>
<script>
  const ul = document.getElementById('ul');
  function appendLog(label, text) {
    const li = document.createElement('li');
    li.innerText = `${label}: ${text}`;
    ul.appendChild(li);
  }

  void async function() {
    appendLog('Referrer', document.referrer);

    if (!'serviceWorker' in navigator) throw 'Not supported ServiceWorker';
    const {serviceWorker} = navigator;
    const registration = await serviceWorker.register('./sw.js').catch((error) => {
      console.log(error);
    });
    // console.log(registration)
    // if (registration) registration.unregister(registration);

    serviceWorker.addEventListener('message', event => {
      console.log(event);
    });

    setInterval(async () => {
      const response = await fetch('api/getDate.php');
      const json = await response.json();
      appendLog('getDate.php', json.date);
    }, 1000);
  }();
</script>
