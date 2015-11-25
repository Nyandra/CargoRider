

  $.fn.raty.defaults.path = '../lib/images';

  $(function() {
    $('#default').raty();


$('.scorenumberuser').raty({
  readOnly: true,
 // noRatedMsg : "Bitte auswählen!",
 starOff: 'user_leer.png',
 starOn: 'user_voll.png',
 hints: ['1 Person hat bereits gebucht', '2 Personen haben bereits gebucht', '3 Personen haben bereits gebucht', '4 Personen haben bereits gebucht', '5 Personen haben bereits gebucht', '6 Personen haben bereits gebucht','7 Personen haben bereits gebucht', '8 Personen haben bereits gebucht','9 Personen haben bereits gebucht', '10 Personen haben bereits gebucht'],
	//target: '#hint',
 score: function() {
    return $(this).attr('data-score');
  },
number: function() {
    return $(this).attr('data-number');
  }  });

$('.scorenumberanchor').raty({
  readOnly: true,
 // noRatedMsg : "Bitte auswählen!",
  starOff: 'anchor_leer.png',
 starOn: 'anchor_voll.png',
 starHalf: 'anchor_halb.png',
 hints: ['schlecht', 'geht so', 'mittel', 'gut', 'sehr gut','ausgezeichnet'],
score: function() {
    return $(this).attr('data-score');
  },
number: function() {
    return $(this).attr('data-number');
  }  });



  });