<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class InnQuestionRecord
{
    private int $byteSize = 0;
    /** @var int */
    private int $questionLength;
    /** @var string */
    private string $question = "";
    /** @var int */
    private int $answerLength;
    /** @var string */
    private string $answer = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    /**
     * Sets the size of the data that this was deserialized from.
     *
     * @param int $byteSize The size of the data that this was deserialized from.
     */
    public function setByteSize(int $byteSize): void {
        $this->byteSize = $byteSize;
    }

    /** @return string */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /** @param string $question */
    public function setQuestion(string $question): void
    {
        $this->question = $question;
        $this->questionLength = mb_strlen($this->question);
    }

    /** @return int */
    public function getQuestionLength(): int
    {
        return $this->questionLength;
    }

    /** @param int $questionLength */
    public function setQuestionLength(int $questionLength): void
    {
        $this->questionLength = $questionLength;
    }

    /** @return string */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /** @param string $answer */
    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
        $this->answerLength = mb_strlen($this->answer);
    }

    /** @return int */
    public function getAnswerLength(): int
    {
        return $this->answerLength;
    }

    /** @param int $answerLength */
    public function setAnswerLength(int $answerLength): void
    {
        $this->answerLength = $answerLength;
    }


    /**
     * Serializes an instance of `InnQuestionRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InnQuestionRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InnQuestionRecord $data): void {
        if ($data->getQuestionLength() == null)
        {
            throw new SerializationError('questionLength must be provided.');
        }
        $writer->addChar($data->getQuestionLength());

        if ($data->getQuestion() == null)
        {
            throw new SerializationError('question must be provided.');
        }
        if (strlen($data->question) > 252)
        {
            throw new SerializationError("Expected length of question to be 252 or less, got " . strlen($data->question) . ".");
        }
        $writer->addFixedString($data->getQuestion(), $data->getQuestionLength(), false);

        if ($data->getAnswerLength() == null)
        {
            throw new SerializationError('answerLength must be provided.');
        }
        $writer->addChar($data->getAnswerLength());

        if ($data->getAnswer() == null)
        {
            throw new SerializationError('answer must be provided.');
        }
        if (strlen($data->answer) > 252)
        {
            throw new SerializationError("Expected length of answer to be 252 or less, got " . strlen($data->answer) . ".");
        }
        $writer->addFixedString($data->getAnswer(), $data->getAnswerLength(), false);


    }

    /**
     * Deserializes an instance of `InnQuestionRecord` from the provided `EoReader`.
     *
     * @param EoReader $reader The reader that the data will be deserialized from.
     * @return InnQuestionRecord The deserialized data.
     */
    public static function deserialize(EoReader $reader): InnQuestionRecord
    {
        $data = new InnQuestionRecord();
        $old_chunked_reading_mode = $reader->isChunkedReadingMode();
        try {
            $reader_start_position = $reader->getPosition();
            $data->setQuestionLength($reader->getChar());
            $data->setQuestion($reader->getFixedString($data->getQuestionLength(), false));
            $data->setAnswerLength($reader->getChar());
            $data->setAnswer($reader->getFixedString($data->getAnswerLength(), false));

            $data->setByteSize($reader->getPosition() - $reader_start_position);

            return $data;
        } finally {
            $reader->setChunkedReadingMode($old_chunked_reading_mode);
        }
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function __toString(): string {
        return "InnQuestionRecord(byteSize=$this->byteSize, question=".var_export($this->question, true).", answer=".var_export($this->answer, true).")";
    }

}


