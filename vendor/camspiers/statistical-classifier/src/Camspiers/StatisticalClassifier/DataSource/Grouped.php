<?php

/**
 * This file is part of the Statistical Classifier package.
 *
 * (c) Cam Spiers <camspiers@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Camspiers\StatisticalClassifier\DataSource;

/**
 * @author  Cam Spiers <camspiers@gmail.com>
 * @package Statistical Classifier
 */
class Grouped extends DataArray
{
    /**
     * The data sources to use
     * @var array
     */
    protected $dataSources = array();
    /**
     * Create the object passing in the datasources as an array
     * @param array $dataSources The data sources
     */
    public function __construct($dataSources = null)
    {
        if (is_array($dataSources)) {
            foreach ($dataSources as $dataSource) {
                $this->addDataSource($dataSource);
            }
        }
    }
    /**
     * Add a data source to the array
     * @param DataSourceInterface $dataSource The data source
     */
    public function addDataSource(DataSourceInterface $dataSource)
    {
        $this->dataSources[] = $dataSource;
    }
    /**
     * @{inheritdoc}
     */
    public function read()
    {
        $groupedData = array();
        foreach ($this->dataSources as $dataSource) {
            $groupedData = array_merge($groupedData, $dataSource->getData());
        }

        return $groupedData;
    }
}
