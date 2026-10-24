<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Naixiaoxin\HyperfWechat;

/**
 * Class EasyWechat.
 *
 * @method static \EasyWeChat\OfficialAccount\Application  officialAccount(string $name = "default", array $config = [])
 * @method static \EasyWeChat\Work\Application  work(string $name = "default", array $config = [])
 * @method static \EasyWeChat\MiniProgram\Application  miniProgram(string $name = "default", array $config = [])
 * @method static \EasyWeChat\Payment\Application  payment(string $name = "default", array $config = [])
 * @method static \EasyWeChat\OpenPlatform\Application  openPlatform(string $name = "default", array $config = [])
 * @method static \EasyWeChat\OpenWork\Application  openWork(string $name = "default", array $config = [])
 * @method static \EasyWeChat\MicroMerchant\Application  microMerchant(string $name = "default", array $config = [])
 */
class EasyWechat
{
    public static function __callStatic($functionName, $args)
    {
        if (class_exists(\Hyperf\Context\ApplicationContext::class)) {
            $container = \Hyperf\Context\ApplicationContext::getContainer();
        } else {
            $container = \Hyperf\Utils\ApplicationContext::getContainer();
        }

        return $container->get(Factory::class)->{$functionName}(...$args);
    }
}
