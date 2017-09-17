<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form id="form">
    <input type="text" name="name" value="LACC PERU bar">
    <input type="text" name="description" value="Melhor pisco LIMA da região">
    <input type="file" name="photo" id="file">
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    $( '#file' ).on( 'change', function () {

        let formData = new FormData();
        formData.append( 'name', 'LACC PERU 123 bar' );
        formData.append( 'description', 'Melhor pisco de LIMA_PERU da região' );
        formData.append( 'photo', $( '#file' )[0].files[0] );

        let headers = {
            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhiZGRhNzU2YjYxMjU5MWFhYzEwMDVjMWZkMTExNTUyYjMwMTNlMzExN2VlOGUyMThjMzg4Zjc4MmFlMzY1MTJiOGZjMTEyNmUyZDUzYzhkIn0.eyJhdWQiOiIzIiwianRpIjoiOGJkZGE3NTZiNjEyNTkxYWFjMTAwNWMxZmQxMTE1NTJiMzAxM2UzMTE3ZWU4ZTIxOGMzODhmNzgyYWUzNjUxMmI4ZmMxMTI2ZTJkNTNjOGQiLCJpYXQiOjE1MDU2MTg4NjUsIm5iZiI6MTUwNTYxODg2NSwiZXhwIjoxNTM3MTU0ODY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.eC1WAbMceUplxYpfDcrrTtuMMxOfgIposdNZUPQcL1QGcXllYAwXpgWS1f6Ai7L-15O-EpO2LiNAhaA7dbIeSh065o1MYnxWZV4BjApgjVJCclS0zsAVunETrJz47NwvMHcKZDe8DmzEUAJY_9SBmalLna7j_xSCKS8-7J--pMEzd-5e3hYhAypv0Ap03oF4l6d18aHFa2NlK1H73u9J52mTkrQxYdIDQGcJgbYIraMPBQ1G2cf-QwWUMyZilp62PKm236JAbr2XqPzt5IuWGEAcCP2GWWJEToXSA1p-x5feesVPHHaQL0cqreT9Cq7hRFnQCYUPUNATwi809bYXjjcqIvzgTVSWn67jAtz_Bpvp5vFnejSJqcYjCjhiGEUYULIYxim9E-wwPAGNNriy_qW0H-H9afiV9g3IXytHwbkWSQIEe2fsAudADmqK_GsILvSEZ4K1HsF54j9TfCVRVuH1oJ9-CI6aaf9wuyLZu05EMeAzM_7gQUPe_TPttCZZb0FXKjSf8v4oHhWv5hC70uxvG2WmDQ1_omo-4U6AWZeL-m5k7rpWeiAkTa3gxFZytoSH4Sfep_okF78C-dV-MRsfNnYpPeP92ABxRbX3Gg6MmzlA0cbpuU_yl6oWU-3tsU6124IjGcWBe-PssIz8179oWD8O5j71dtughNAMbLE',
            //'content-type': 'multipart/form-data'
            'content-type' : 'application/x-www-form-urlencoded'
        };

        axios.post( 'http://localhost:8000/api/v1/restaurants/2', formData, { headers: headers } )
    } )
</script>
</body>
</html>