<?php



class RouterController extends Controller
{

	protected Controller $controller;

	private function diacritics(string $text): string
	{
		$text = str_replace('-', ' ', $text);
		$text = ucwords($text);
		$text = str_replace(' ', '', $text);
		return $text;
	}

	private function parseURL(string $url): array
	{
		$parsedURL = parse_url($url);
		$parsedURL["path"] = ltrim($parsedURL["path"], "/");
		$parsedURL["path"] = trim($parsedURL["path"]);
		$parsedURL = explode("/", $parsedURL["path"]);
		return $parsedURL;
	}

	public function process(array $params): void
	{
		$parsedURL = $this->parseURL($params[0]);

		if (empty($parsedURL[0]))
			$this->redirect('cart');
		$controllerType = $this->diacritics(array_shift($parsedURL)) . 'Controller';

		if (file_exists('controllers/' . $controllerType . '.php'))
			$this->controller = new $controllerType;
		// else
		// 	$this->redirect('chyba');

		$this->controller->process($parsedURL);

		// Nastavení hlavní šablony
		$this->view = 'main';
	}

}