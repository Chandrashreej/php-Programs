<?php
class User
{
    public function borrowBook() {
        $bookManager = new Book_Manager();
        $bookManager->returnBooks();

        $bookPayments = new Book_Payments();
        if ($bookPayments->hasOverdueBooks()) {
            $bookPayments->payBookFines();
        }

        $bookLibrary = new Book_Library();
        $bookReservations = new Book_Reservations();

        $book = $bookLibrary->searchBooks();
        $isAvailable = $bookLibrary->isBookAvailable($book);
        $isReserved = $bookReservations->isBookReserved($book); 
        if ($isAvailable && !$isReserved) {
            $bookLibrary->locateBook($book);

            $bookManager->borrowBook($book);
            $bookLibrary->updateBookAvailability($book, $status);
        }
    }
}
class Library_Facade
{
    public function returnBooks() {
        // previous implementation by calling necessary classes
    }

    public function borrowBooks() {
    }

    public function searchBooks() {
    }

    public function reserveBooks() {
    }
}
class UserPre
{
    public function borrowBook() {
        $libraryFacade = new Library_Facade();
        $libraryFacade->borrowBook();
    }
}
$user = new UserPre();
$user->borrowBook();