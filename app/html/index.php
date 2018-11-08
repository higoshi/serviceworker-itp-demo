<!doctype html>
<ul>
  <li id="referrer"></li>
  <li id="date"></li>>
</ul>
<script>
  void async function() {
    document.getElementById('referrer').innerText = document.referrer;
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
      const text = await response.text();
      document.getElementById('date').innerText = text;
    }, 1000);
  }();
</script>
