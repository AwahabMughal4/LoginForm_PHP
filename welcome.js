function printToken() {
    const tokenValue = document.getElementById('tokenToPrint').innerText;
    window.print();
  }
  
  // Automatically show printable area after the form submits
  window.addEventListener('load', () => {
    const tokenValue = document.getElementById('tokenToPrint').innerText;
    if (tokenValue) {
      document.getElementById('printableArea').style.display = 'block';
      document.getElementById('tokenToPrint').innerText = tokenValue;
    }
  });
  