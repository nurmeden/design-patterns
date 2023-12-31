<?php
interface SortingStrategy
{
    public function sort(array $data);
}

class BubbleSort implements SortingStrategy
{
    public function sort(array $data)
    {
        $n = count($data);

        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    // Обмен значениями
                    $temp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $temp;
                }
            }
        }

        return $data;
    }
}

class QuickSort implements SortingStrategy
{
    public function sort(array $data)
    {
        if (count($data) <= 1) {
            return $data;
        }

        $pivot = $data[0];
        $left = $right = [];

        for ($i = 1; $i < count($data); $i++) {
            if ($data[$i] < $pivot) {
                $left[] = $data[$i];
            } else {
                $right[] = $data[$i];
            }
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }
}

class Sorter
{
    private $sortingStrategy;

    public function __construct(SortingStrategy $sortingStrategy)
    {
        $this->sortingStrategy = $sortingStrategy;
    }

    public function setSortingStrategy(SortingStrategy $sortingStrategy)
    {
        $this->sortingStrategy = $sortingStrategy;
    }

    public function sortData(array $data)
    {
        return $this->sortingStrategy->sort($data);
    }
}

$data = [5, 2, 7, 1, 8];

$sorter = new Sorter(new BubbleSort());
$sortedData = $sorter->sortData($data);
echo implode(", ", $sortedData); // Выводит: "1, 2, 5, 7, 8"

$sorter->setSortingStrategy(new QuickSort());
$sortedData = $sorter->sortData($data);
echo implode(", ", $sortedData); // Выводит: "1, 2, 5, 7, 8"
?>