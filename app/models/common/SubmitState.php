<?php
    enum SubmitState {
        case Success;
        case WrongAnswer;
        case TimeLimit;
        case CompilerError;
        case RuntimeError;
    }
?>