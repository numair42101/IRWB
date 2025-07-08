  const cards = document.querySelectorAll('.card-hack');

  cards.forEach(card => {
    const originalHTML = card.innerHTML;
    const originalHref = card.getAttribute('href');
    let started = false;

    card.addEventListener('click', function handler(e) {
      e.preventDefault();
      if (started) return;

      cards.forEach(c => {
        if (c !== card && c.classList.contains('terminal-mode')) {
          c.classList.remove('terminal-mode');
          c.innerHTML = c.dataset.originalHtml || c.innerHTML;
        }
      });

      if (card.classList.contains('terminal-mode')) return;

      if (!card.dataset.originalHtml) {
        card.dataset.originalHtml = originalHTML;
      }

      card.classList.add('terminal-mode');
      card.innerHTML = `IRWB Terminal [Guest]\n\n> Please write to continue: start`;

      const input = document.createElement('input');
      input.type = 'text';
      input.style.background = 'transparent';
      input.style.border = 'none';
      input.style.outline = 'none';
      input.style.color = '#39ff14';
      input.style.fontFamily = 'Fira Code, monospace';
      input.style.width = '100%';
      input.style.fontSize = '0.85rem';
      input.style.marginTop = '10px';
      input.style.direction = 'ltr';
      input.style.textAlign = 'left';
      input.autofocus = true;

      card.appendChild(input);
      input.focus();

      input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
          const val = input.value.trim().toLowerCase();
          if (val === 'start') {
            started = true;
            card.innerHTML = "Transferring...\n\n[+] Executing start...\n[✔] Redirecting to next stage...";
            setTimeout(() => {
              window.location.replace(originalHref);
            }, 1500);
          } else {
            card.innerHTML = `Invalid command ❌\n\n> Please write to continue: start`;
            card.appendChild(input);
            input.value = '';
            input.focus();
          }
        }
      });
    });
  });
console.clear()
console.log(
  "%c IRWB - سامانه تمرینی آسیب‌پذیری‌ها\n" +
  "😂🤡 سلام هکر! اگه اینجا یه باگ پیدا نکردی، یا خواب بودی یا خودت باگی \n" +
  "مواظب باش، اینجا قراره مغزت دود بشه ",
  "color:rgb(255, 255, 255); background-color: rgba(0, 0, 0, 0.09); font-size: 16px; font-weight: bold; padding: 8px; border-radius: 6px;"
);