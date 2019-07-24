<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2019/7/22
 * Time: 3:54 PM
 */

class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testHello()
    {
        $_GET['name'] = 'Fabien';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello Fabien', $content);
    }
}