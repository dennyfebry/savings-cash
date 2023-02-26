<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_home extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Dashboard
    public function getSumIncome()
    {
        $sql = "SELECT SUM(amount) as total FROM income";
        return $this->db->query($sql);
    }

    public function getSumExpense()
    {
        $sql = "SELECT SUM(total_amount) as total FROM expense";
        return $this->db->query($sql);
    }

    public function getTransaction()
    {
        $sql = "SELECT * FROM
                (SELECT t2.name, t1.date, t1.amount, t1.description as ket, 'income' as type FROM income t1
                LEFT JOIN people t2 ON t2.id = t1.people_id
                UNION
                SELECT item as name, date, total_amount, item as ket, 'expense' as type FROM expense)
                as V2
                ORDER BY date DESC
                LIMIT 5
                ";
        return $this->db->query($sql);
    }

    // Cash
    public function getCash()
    {
        $sql = "SELECT t1.name, SUM(t2.amount) AS amount FROM people t1
                LEFT JOIN income t2 ON t2.people_id = t1.id
                GROUP BY t1.name
                ORDER BY t1.name ASC";
        return $this->db->query($sql);
    }

    public function getCashMax()
    {
        $sql = "SELECT MAX(amount) AS amount FROM (SELECT t2.name, SUM(t1.amount) AS amount FROM income t1
                LEFT JOIN people t2 ON t2.id = t1.people_id
                GROUP BY t1.people_id
                ORDER BY t2.name ASC) AS V1
                ";
        return $this->db->query($sql);
    }

    // People
    public function getPeople()
    {
        $sql = "SELECT * FROM people
                    ORDER BY name ASC";
        return $this->db->query($sql);
    }

    public function getPeopleId($id)
    {
        $sql = "SELECT * FROM people
                WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function addPeople($data)
    {
        return $this->db->insert('people', $data);
    }

    public function updatePeople($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('people', $data);
    }

    public function deletePeople($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('people');
    }

    // Income
    public function getIncome()
    {
        $sql = "SELECT t1.*, t2.name FROM income t1
                LEFT JOIN people t2 ON t2.id = t1.people_id
                    ORDER BY date DESC, created_date DESC";
        return $this->db->query($sql);
    }

    public function getIncomeDate()
    {
        $sql = "SELECT date FROM income
                GROUP BY date
                ORDER BY date DESC";
        return $this->db->query($sql);
    }

    public function getIncomeId($id)
    {
        $sql = "SELECT * FROM income
                WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function addIncome($data)
    {
        return $this->db->insert('income', $data);
    }

    public function updateIncome($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('income', $data);
    }

    public function deleteIncome($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('income');
    }

    // Expense
    public function getExpense()
    {
        $sql = "SELECT * FROM expense
                ORDER BY date DESC, created_date DESC";
        return $this->db->query($sql);
    }

    public function getExpenseDate()
    {
        $sql = "SELECT date FROM expense
                GROUP BY date
                ORDER BY date DESC";
        return $this->db->query($sql);
    }

    public function getExpenseId($id)
    {
        $sql = "SELECT * FROM expense
                WHERE id = '$id'";
        return $this->db->query($sql);
    }

    public function addExpense($data)
    {
        return $this->db->insert('expense', $data);
    }

    public function updateExpense($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('expense', $data);
    }

    public function deleteExpense($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('expense');
    }
}
