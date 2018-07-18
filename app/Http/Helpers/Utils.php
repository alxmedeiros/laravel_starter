<?php
function formatCurrency($currency) {
	return 'R$ '.number_format($currency, 2, ',', '.');
}