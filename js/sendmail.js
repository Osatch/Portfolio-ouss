 // Remplace 'YOUR_USER_ID' par ton User ID d'EmailJS
    emailjs.init("f7Ia3qsX8i__vy_M8");

    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        const templateParams = {
            name: name,
            email: email,
            subject: subject,
            message: message,
        };

        emailjs.send('service_pb69vbj', 'Ytemplate_d2v7rcf', templateParams)
            .then(function(response) {
                document.getElementById('responseMessage').innerText = 'Message envoyé avec succès!';
            }, function(error) {
                document.getElementById('responseMessage').innerText = 'Erreur lors de l\'envoi du message.';
            });
    });