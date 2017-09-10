<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ark\Utils;

class Nucleid
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $require;

    /**
     * @var string
     */
    private $execute;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param string $value
     *
     * @return \BrianFaust\Ark\Utils\Nucleid
     */
    public function require(string $value): Nucleid
    {
        $this->require = $value;

        return $this;
    }

    /**
     * @param string $value
     *
     * @return \BrianFaust\Ark\Utils\Nucleid
     */
    public function execute(string $value): Nucleid
    {
        $this->execute = $value;

        return $this;
    }

    /**
     * @param array $value
     *
     * @return \BrianFaust\Ark\Utils\Nucleid
     */
    public function arguments(array $value): Nucleid
    {
        $this->arguments = array_filter($value);

        return $this;
    }

    /**
     * Execute ark-js through NUCLeId.
     *
     * @return array
     */
    public function send()
    {
        putenv("PATH={$this->path}");

        $output = shell_exec("nucleid -r {$this->require} -e {$this->execute} {$this->buildArguments()} --ojson 2>&1 &");

        return json_decode(str_replace("\n", null, $output));
    }

    /**
     * @return null|string
     */
    private function buildArguments(): ?string
    {
        $arguments = null;

        foreach ($this->arguments as $argument) {
            if (is_string($argument)) {
                $arguments .= '"'.$argument.'" ';
            } else {
                $arguments .= $argument.' ';
            }
        }

        return $arguments;
    }
}
