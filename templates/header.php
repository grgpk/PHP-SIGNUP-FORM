<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up form</title>
  <link rel="stylesheet" href="./style/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(() => {

    $('.btn-signup').click(() => {

      const firstName = $('input[name=firstName]').val();
      const lastName = $('input[name=lastName]').val();
      const email = $('input[name=email]').val();

      $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
          firstName,
          lastName,
          email
        },
        success: (data) => {
          if (data === 'success') {
            $('.error').hide();
            $('.success-notification').show();

          } else {
            console.log(data);
            const errors = JSON.parse(data);
            const errorFields = ['firstName', 'lastName', 'email'];

            for (let field of errorFields) {

              if (field in errors) {

                $(`.${field}-error`).html(errors[field]).show();

              } else {

                $(`.${field}-error`).html(errors[field]).hide();
              }
            }
          }
        },
      })
    })

    $('.btn-delete').click(function() {
      const id = $(this).attr('data-id');
      $.ajax({
        type: 'POST',
        url: 'users.php',
        data: {
          id
        },

        success: () => {
          $(this).closest('tr').remove();
        }
      })
    })
  })
  </script>
</head>

<body>
  <nav>
    <ul>
      <li>
        <a href="index.php">Sign up</a>
      </li>
      <li>
        <a href="users.php">Users</a>
      </li>
    </ul>
  </nav>