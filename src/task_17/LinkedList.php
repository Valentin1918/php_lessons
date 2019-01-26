<?php
require __DIR__ . '/SeparateObject.php';
class LinkedList
{
    public $head;
    public $tail;
    public $count = 0;
    public function isEmpty() {
        return empty($this->head);
    }
    /**
     * @return mixed
     */
    public function getTail()
    {
        return $this->tail;
    }
    // ссылка на текущий
    public function append($key, $value) {
        $sObject = new SeparateObject($key, $value);
        if($this->isEmpty()) {
            $this->head = $sObject;
        }
        $sObject->prev = $this->getTail();
        if($this->getTail()) {
            $this->getTail()->next = $sObject;
        }
        $this->tail = $sObject;
        $this->count++;
    }
    public function search($key) {
        if($this->isEmpty()) {
            throw new Exception("Can't search through empty linked list!");
        }
        /** @var SeparateObject $item */
        $item = $this->head;
        do {
            if($item->key === $key) {
                return $item;
            }
            $item = $item->next;
        } while(!empty($item));
    }
    public function delete($value) {
        if($this->isEmpty()) {
            throw new Exception("Nothing to delete!");
        }
        /** @var SeparateObject $item */
        $item = $this->head;
        do {
            if($item->value === $value) {
                if (!empty($item->prev) && !empty($item->next)) {
                    $item->prev->next = $item->next;
                    $item->next->prev = $item->prev;
                }
                if (empty($item->prev) && !empty($item->next)) {
                    $item->next->prev = NULL;
                    $this->head = $item->next;
                }
                if (!empty($item->prev) && empty($item->next)) {
                    $item->prev->next = NULL;
                    $this->tail = $item->prev;
                }
                if (empty($item->prev) && empty($item->next)) {
                    $this->head = NULL;
                    $this->tail = NULL;
                }
                $this->count--;
            }
            $item = $item->next;
        } while(!empty($item));
    }
}
$llObject = new LinkedList();

////$element = new SeparateObject();
//var_dump($llObject->isEmpty());

$llObject->append(16, 'hello');
$llObject->append(4, 'from');
$llObject->append(21, 'list');

try {
    $llObject->delete( 'hello');
    $llObject->delete( 'from');
    $llObject->delete( 'list');
} catch (Exception $e) {
    var_dump("Error: {$e->getMessage()}");
}


var_export($llObject);
//try {
//    var_dump($llObject->search(4)->value);
//} catch (Exception $e) {
//    var_dump("Error: {$e->getMessage()}");
//}