<?php
/**
 * Generated from the eo-protocol XML specification.
 *
 * This file should not be modified.
 * Changes will be lost when code is regenerated.
 */

namespace Eolib\Protocol\Generated\Pub\Server;

use Eolib\Data\EoReader;
use Eolib\Data\EoWriter;
use Eolib\Protocol\SerializationError;


class InnQuestionRecord
{
    private $byteSize = 0;
    private int $questionLength;
    private string $question = "";
    private int $answerLength;
    private string $answer = "";

    /**
     * Returns the size of the data that this was deserialized from.
     *
     * @return int The size of the data that this was deserialized from.
     */
    public function getByteSize(): int {
        return $this->byteSize;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
        $this->questionLength = strlen($this->question);
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
        $this->answerLength = strlen($this->answer);
    }


    /**
     * Serializes an instance of `InnQuestionRecord` to the provided `EoWriter`.
     *
     * @param EoWriter $writer The writer that the data will be serialized to.
     * @param InnQuestionRecord $data The data to serialize.
     */
    public static function serialize(EoWriter $writer, InnQuestionRecord $data): void {
        if ($data->questionLength === null)
        {
            throw new SerializationError('questionLength must be provided.');
        }
        $writer->addChar($data->questionLength);

        if ($data->question === null)
        {
            throw new SerializationError('question must be provided.');
        }
        if (strlen($data->question) > 252)
        {
            throw new SerializationError("Expected length of question to be 252 or less, got {strlen($data->question)}.");
        }
        $writer->addFixedString($data->question, $data->questionLength, false);

        if ($data->answerLength === null)
        {
            throw new SerializationError('answerLength must be provided.');
        }
        $writer->addChar($data->answerLength);

        if ($data->answer === null)
        {
            throw new SerializationError('answer must be provided.');
        }
        if (strlen($data->answer) > 252)
        {
            throw new SerializationError("Expected length of answer to be 252 or less, got {strlen($data->answer)}.");
        }
        $writer->addFixedString($data->answer, $data->answerLength, false);


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
            $data->questionLength = $reader->getChar();
            $data->question = $reader->getFixedString($data->questionLength, false);
            $data->answerLength = $reader->getChar();
            $data->answer = $reader->getFixedString($data->answerLength, false);

            $data->byteSize = $reader->getPosition() - $reader_start_position;

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
        return "InnQuestionRecord(byteSize=' . $this->byteSize . '', question=' . $this->question . '', answer=' . $this->answer . ')";
    }

}


