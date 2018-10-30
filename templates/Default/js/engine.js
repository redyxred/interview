var background = document.createElement('div');
var text = document.createElement('div');
var action = false;

function hideMessage() {
	background.remove();
	text.remove();
	action = false;
}

function showMessage(type, message) {
	if (action == true) {
		text.innerHTML = message;
		text.id = 'text';
		background.id = "notification";
		background.className = type;
		background.appendChild(text);
		background.style.display = "block";

		document.body.appendChild(background);
		setTimeout(hideMessage, 3000);
	}
}

background.addEventListener("click", hideMessage, false);

$(document).ready(function () {

	$('#register').on('click', function (e) {
		var form = $('#regForm').serialize();
		e.preventDefault();

		$.ajax({
			url: '/core/actions/register.php',
			type: 'POST',
			data: form,
			success: function (result) {
				var res = JSON.parse(result);
				if (res.error == true) {
					alert(res.message);
				} else {
					window.location = "/";
				}
			},
			error: function (xhr, code) {
				alert(xhr + code);
			}
		});
	});

	$('#login').on('click', function (e) {
		var form = $('#loginForm').serialize();
		e.preventDefault();

		$.ajax({
			url: '/core/actions/login.php',
			type: 'POST',
			data: form,
			success: function (result) {
				var res = JSON.parse(result);
				if (res.error == true) {
					alert(res.message);
				} else {
					window.location = "/";
				}
			},
			error: function (xhr, code) {
				alert(xhr + code);
			}
		});
	});
	if (action == false) {
		$("#addQuestionBtn").on('click', function (e) {
			e.preventDefault();

			var form = $("#addQuestion").serialize();

			$.ajax({
				url: '/core/actions/add-question.php',
				type: 'POST',
				data: form,
				success: function (result) {
					var res = JSON.parse(result);
					action = true;
					if (res.error == true) {
						showMessage('error', res.message);
					} else {
						showMessage('success', res.message);
					}
				},
				error: function (xhr, code) {
					alert(xhr + code);
				}
			});
		});
	}

	var isEdit = false;

	var username = document.getElementById('userName');
	var email = document.getElementById('email');
	var button = document.getElementById('editBtn');

	var form_username = '<span id="userName"><input type="text" class="inptUsername" name="username" placeholder="' + username.innerHTML + '"></span>';
	var form_email = '<span id="email"><input type="email" class="inptEmail" name="email" placeholder="' + email.innerHTML + '"></span>';

	var std_username = '<span id="userName">' + username.innerHTML + '</span>';
	var std_email = '<span id="email">' + email.innerHTML + '</span>';

	if (action == false) {
		$(".editBtn").on('click', function (e) {
			e.preventDefault();
			if (isEdit == false) {
				username = document.getElementById('userName');
				email = document.getElementById('email');
				button = document.getElementById('editBtn');

				username.outerHTML = form_username;
				email.outerHTML = form_email;

				button.querySelector("button.editBtn").innerHTML = "Сохранить";
				button.querySelector("button.editBtn").className += " active";
				isEdit = true;
			} else {
				var form = $("#editForm").serialize();
				$.ajax({
					url: '/core/actions/profile-edit.php',
					type: 'POST',
					data: form,
					success: function (result) {
						var res = JSON.parse(result);
						action = true;
						if (res.error == true) {
							showMessage('error', res.message);
						} else {

							if (res.message != "") {
								showMessage('success', res.message);
							}

							username = document.getElementById('userName');
							email = document.getElementById('email');
							button = document.getElementById('editBtn');

							var inp_username = "";
							var inp_email = "";

							if (username.querySelector("input.inptUsername").value == "") {
								inp_username = username.querySelector("input.inptUsername").getAttribute("placeholder");
							} else {
								inp_username = username.querySelector("input.inptUsername").value;
							}

							if (email.querySelector("input.inptEmail").value == "") {
								inp_email = email.querySelector("input.inptEmail").getAttribute("placeholder");
							} else {
								inp_email = email.querySelector("input.inptEmail").value;
							}

							var std_username = '<span id="userName">' + inp_username + '</span>';
							var std_email = '<span id="email">' + inp_email + '</span>';

							username.outerHTML = std_username;
							email.outerHTML = std_email;

							button.querySelector("button.editBtn").innerHTML = "Редактировать";
							button.querySelector("button.editBtn").className = "editBtn";
							isEdit = false;
						}
					},
					error: function (xhr, code) {
						alert( xhr + code );
					}
				});
				
			}

		});
	}
});

function sendVote(id, question_id) {
	
	if (action == false) {
		$.ajax({
			url: '/core/actions/vote.php',
			type: 'POST',
			data: 'id=' + id,
			success: function (result) {
				var res = JSON.parse(result);
				if (res.error == true) {
					action = true;
					showMessage('error', res.message);
				} else {
					location.reload();
				}
			},
			error: function (xhr, code) {
				alert(xhr + code);
			}
		});
	}

	return false;
}