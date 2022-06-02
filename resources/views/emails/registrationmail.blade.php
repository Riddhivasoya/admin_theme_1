<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h4>Mail From Contact us Form</h4><br/>

    Name  :      {{ $input['first_name'] }}<br/>
    Email :      {{ $input['email'] }}   <br/>
    Contact :    {{ $input['mobile'] }} <br/>
    birthdate :  {{ $input['birthdate'] }} <br/>
    <p>It would be appriciative, if you gone through this feedback.</p>

</body>
</html>