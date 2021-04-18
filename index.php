<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$pageTitle = "URL Decoder/Encoder";
include_once '../_template/head.php';
$uri = '';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<body>
	<div class="container">
		<?php include_once '../_template/header.php'; ?>
		<div class="row">
			<div class="col-sm-12 col-md-8">
				<h1><?= $pageTitle ?></h1>
				<h4>Beschreibung:</h4>
				<p>Um eine Encodierte URL, die anhand von komischen Zeichen (%20, %3A) erkennt werden kann, lesbar zu machen, bitte einfach in das Feld reinkopieren.
					Danach muss der entsprechende Modus ausgewählt werden und die Url wird entsprechend verarbeitet.</p>
			</div>
		</div>
		<div class="row mb-5">
				<div class="col-sm-12 mb-3">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="runType" id="decode" value="decode" checked>
						<label class="form-check-label" for="decode">
							Decode
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="runType" id="encode" value="encode">
						<label class="form-check-label" for="encode">
							Encode
						</label>
					</div>
				</div>
				<div class="col-sm-12 col-md-8">
					<input class="form-control" type="uri" name="uri" id="uri" value="<?php echo $_POST['uri'] ?? ''; ?>">
				</div>
				<div class="col-sm-12 col-md-2">
					<a class="btn btn-warning" id="run">
						Los
					</a>
				</div>
		</div>
		<script>
			$("#run").click(function() {
				var uri = $("#uri").val();
				var runType = $('input[name=runType]:checked').val()
				$.ajax({
					type: 'POST',
					url: '/angela/url-decode/function.php',
					// dataType: 'json',
					data: {
						uri: uri,
						type: runType,
					},
					success: function(data) {
						$('.wrapperData').html(data);
					}
				});
			});
		</script>
		<div class="row mb-5">
			<div class="col-sm-12 col-md-8 wrapperData"></div>
		</div>
	</div>
</body>
<?php include '../_template/footer.php'; ?>