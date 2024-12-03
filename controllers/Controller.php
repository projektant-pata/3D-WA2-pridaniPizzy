<?php
abstract class Controller
{

    protected array $data = array();

    protected string $view = "";

	private function treat(mixed $x = null): mixed
	{
		if (!isset($x))
			return null;
		elseif (is_string($x))
			return htmlspecialchars($x, ENT_QUOTES);
		elseif (is_array($x)) {
			foreach($x as $k => $v)	{
				$x[$k] = $this->treat($v);
			}
			return $x;
		} else
			return $x;
	}

    public function renderView(): void
    {
        if ($this->view) {
            extract($this->treat($this->data));
			extract($this->data, EXTR_PREFIX_ALL, "");
            require("views/" . $this->view . ".phtml");
        }
    }

	public function redirect(string $url): never
	{
		header("Location: /$url");
		header("Connection: close");
        exit;
	}

    abstract function process(array $params): void;

}