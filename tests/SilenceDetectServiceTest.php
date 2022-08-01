<?php

use PHPUnit\Framework\TestCase;
use Src\Services\SilenceDetectService;

final class SilenceDetectServiceTest extends TestCase
{
    /**
     * @var array
     */
    protected array $fileSettings;

    /** @test */
    public function returnsArrayInRightFormat(): void
    {
        $result = $this->getResultFromFiles();

        self::assertArrayHasKey('longest_user_monologue', $result);
        self::assertArrayHasKey('longest_customer_monologue', $result);
        self::assertArrayHasKey('user_talk_percentage', $result);
        self::assertArrayHasKey('user', $result);
        self::assertArrayHasKey('customer', $result);
    }

    /** @test */
    public function detectsTheRightPoints()
    {
        $result = $this->getResultFromFiles();

        $expected = [[0,3.504],[6.656,14.0],[19.712,20.144],[27.264,36.528],[41.728,47.28],[49.792,61.104],[65.024,79.024],[81.152,125.232],[128.384,128.56],[132.224,132.656],[142.464,143.92],[147.072,147.888],[166.272,167.472],[169.6,189.616],[195.584,202.288],[204.672,204.72],[207.232,207.28],[215.68,218.16],[220.16,222.0],[224.128,225.968],[229.888,231.856],[235.392,235.44],[240.512,240.56],[244.864,245.424],[249.344,249.264],[259.712,259.76],[262.144,269.232],[272.256,275.12],[277.632,278.064],[280.32,284.08],[286.464,293.936],[297.088,300.592],[303.872,342.96],[345.6,346.032],[348.416,353.2],[357.888,358.448],[369.408,370.224],[390.784,429.488],[433.536,433.968],[439.936,444.336],[456.96,456.88],[460.416,460.336],[465.408,468.912],[480.0,479.92],[492.8,492.72],[499.456,499.76],[507.392,508.464],[511.232,542.128],[552.704,552.752],[555.904,556.464],[564.096,568.752],[572.8,572.848],[575.104,576.176],[582.016,582.704],[585.472,587.824],[592.768,595.12],[598.528,610.352],[619.648,619.696],[622.848,659.504],[662.272,663.344],[670.976,673.2],[681.216,681.648],[683.904,685.488],[688.128,688.048],[691.2,692.656],[696.448,708.784],[711.552,752.048],[754.688,759.728],[762.624,846.896],[857.984,1135.54],[1139.07,1139.5],[1144.96,1267.76],[1271.04,1271.34],[1275.65,1275.7],[1283.07,1283.25],[1291.26,1291.31],[1296.38,1297.84],[1300.1,1300.02],[1302.53,1304.62],[1310.08,1310.51],[1315.07,1637.42],[1643.01,1643.31],[1648.51,1650.61],[1654.02,1654.32],[1663.1,1663.54],[1672.19,1672.24],[1680.38,1680.69],[1685.5,1716.14],[1720.58,1721.01],[1724.54,1724.59],[1735.42,1778.99],[1782.27,1783.98],[1786.37,1787.06],[1790.34,1790.64],[1793.79,1794.99],[1799.17,1852.85],[1856.77]];
        self::assertSame($expected, $result['user']);
        $expected = [[0,1.84],[4.48,26.928],[29.184,29.36],[31.744,56.624],[58.624,66.992],[69.632,91.184],[106.496,108.976],[112.384,290.352],[295.936,308.144],[338.56,338.864],[344.064,400.688],[406.272,406.448],[410.24,412.592],[419.456,420.016],[423.424,424.88],[428.032,428.08],[430.336,517.168],[519.296,519.472],[521.856,521.904],[535.808,536.112],[540.672,599.6],[602.752,603.056],[606.208,629.936],[632.192,632.496],[643.072,647.856],[651.264,651.312],[654.592,714.16],[726.528,726.704],[730.24,732.336],[736.256,738.48],[742.144,745.264],[750.336,754.224],[759.04,768.176],[770.688,772.144],[811.392,811.696],[821.632,821.808],[828.8,829.616],[835.84,840.88],[844.416,858.416],[876.032,876.08],[878.208,882.864],[899.072,899.376],[901.76,902.32],[930.944,931.376],[941.312,943.024],[949.888,950.832],[980.48,981.296],[989.568,989.872],[995.84,995.888],[1002.62,1003.06],[1028.35,1028.78],[1073.41,1073.71],[1089.92,1090.22],[1112.32,1114.16],[1127.3,1127.6],[1134.98,1144.37],[1148.67,1148.72],[1153.79,1155.63],[1160.45,1161.14],[1164.93,1165.1],[1171.97,1172.02],[1176.7,1177.26],[1179.9,1188.53],[1194.88,1195.18],[1197.57,1197.49],[1212.54,1216.69],[1219.84,1220.14],[1229.31,1229.62],[1243.39,1245.36],[1251.97,1254.7],[1260.03,1264.43],[1266.94,1314.74],[1319.68,1319.86],[1323.39,1324.72],[1328.9,1329.58],[1341.57,1343.79],[1354.11,1354.16],[1356.54,1358.64],[1362.3,1362.48],[1367.17,1372.46],[1377.66,1377.97],[1381.5,1381.68],[1386.11,1387.18],[1391.23,1391.79],[1394.56,1394.61],[1401.86,1401.9],[1406.21,1408.18],[1416.58,1416.88],[1433.6,1435.82],[1440.13,1441.07],[1469.7,1469.87],[1477.76,1477.94],[1487.62,1487.92],[1494.66,1496.62],[1525.89,1526.06],[1536.13,1543.98],[1565.44,1565.74],[1576.58,1577.78],[1602.69,1602.99],[1626.75,1631.41],[1635.84,1685.04],[1698.82,1699.12],[1701.76,1701.94],[1715.2,1741.74],[1744.51,1758.0],[1760.38,1761.2],[1767.42,1767.47],[1770.24,1770.54],[1775.87,1801.65],[1805.31,1805.62],[1813.25,1813.55],[1837.18,1840.05],[1843.71,1844.66],[1851.01]];
        self::assertSame($expected, $result['customer']);
    }

    /** @test */
    public function calculatesUserTalkPercentage()
    {
        $result = $this->getResultFromFiles();

        self::assertSame(73.11, $result['user_talk_percentage']);

        $baseDir = dirname(__DIR__, 1);
        $settings = [
            'customer' => ['inputPath' => $baseDir . '/tests/input/customer-channel1.txt'],
            'user'     => ['inputPath' => $baseDir . '/tests/input/user-channel1.txt'],
        ];
        $result = $this->getResultFromFiles($settings);

        self::assertSame(35.53, $result['user_talk_percentage']);

        $settings = [
            'customer' => ['inputPath' => $baseDir . '/tests/input/customer-channel2.txt'],
            'user'     => ['inputPath' => $baseDir . '/tests/input/user-channel2.txt'],
        ];
        $result = $this->getResultFromFiles($settings);

        self::assertSame(53.72, $result['user_talk_percentage']);
    }

    /** @test */
    public function calculatesLongestMonolog()
    {
        $result = $this->getResultFromFiles();

        self::assertSame(317.56, $result['longest_user_monologue']);
        self::assertSame(161.79, $result['longest_customer_monologue']);

        $baseDir = dirname(__DIR__, 1);
        $settings = [
            'customer' => ['inputPath' => $baseDir . '/tests/input/customer-channel1.txt'],
            'user'     => ['inputPath' => $baseDir . '/tests/input/user-channel1.txt'],
        ];
        $result = $this->getResultFromFiles($settings);

        self::assertSame(7.34, $result['longest_user_monologue']);
        self::assertSame(12.93, $result['longest_customer_monologue']);

        $settings = [
            'customer' => ['inputPath' => $baseDir . '/tests/input/customer-channel2.txt'],
            'user'     => ['inputPath' => $baseDir . '/tests/input/user-channel2.txt'],
        ];
        $result = $this->getResultFromFiles($settings);

        self::assertSame(8.83, $result['longest_user_monologue']);
        self::assertSame(12.93, $result['longest_customer_monologue']);
    }

    /**
     * Get result from detectFromFiles method
     *
     * @param array $settings
     * @return array
     */
    protected function getResultFromFiles(array $settings = []): array
    {
        $service = new SilenceDetectService();
        return $service->detectFromFiles($this->fileSettings($settings));
    }

    /**
     * Set file settings
     * Get file settings
     * When $settings is empty provides defaults
     *
     * @param array $settings
     * @return array|string[][]
     */
    protected function fileSettings(array $settings = []): array
    {
        $baseDir = dirname(__DIR__, 1);
        if (!$settings) {
            $settings = [
                'customer' => ['inputPath' => $baseDir . '/tests/input/customer-channel.txt'],
                'user'     => ['inputPath' => $baseDir . '/tests/input/user-channel.txt'],
            ];
        }
        $this->fileSettings = $settings;

        return $this->fileSettings;
    }
}