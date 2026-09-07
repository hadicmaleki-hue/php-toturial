<?php 

    class Person 
    {
        public int $index;
        public string $fname;
        public string $lname;
        public string $phone;
        public string $address;
        public string $email;

        private function generateViewLink(): string 
        {
           return  "<a href='app.php?page=view&index=" . ($this->index) . "'>View</a>";
        }

        private function generateEditLink(): string 
        {
           return  "<a href='app.php?page=form&action=edit&index=" . ($this->index) . "'>Edit</a>";
        }

        private function generateDeleteLink(): string 
        {
           return  "<a href='delete.php?index=" . ($this->index) . "'>Delete</a>";
        }

        public function generateLinks(): string
        {
            return
                $this->generateViewLink() . " | " .
                $this->generateEditLink() . " | " .
                $this->generateDeleteLink();
        }
    }
?>