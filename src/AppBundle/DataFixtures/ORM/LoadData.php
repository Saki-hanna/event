<?php

namespace AppBundle\DataFixtures\ORM;

    use Doctrine\Common\DataFixtures\AbstractFixture;
    use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
    use Symfony\Component\Yaml\Yaml;

abstract class LoadData extends AbstractFixture implements OrderedFixtureInterface
{

    protected function loadFixture($fixture)
    {
        $path = __DIR__.'/../Data/' . $fixture.'.yml';
        return Yaml::parse(file_get_contents($path));
    }
}
